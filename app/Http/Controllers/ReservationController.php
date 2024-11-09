<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReservationController extends Controller
{
    /**
     * Constructor para aplicar middleware de autenticación y rol.
     * El middleware se gestiona en las rutas web.
     */
    public function __construct()
    {
        // Las rutas aplican los middleware correspondientes.
    }

    /**
     * Mostrar las reservaciones del cliente autenticado.
     */
    public function index()
    {
        $reservations = Reservation::where('user_id', auth()->id())->with('room')->get();
        return view('reservations.index', compact('reservations'));
    }

    /**
     * Mostrar el formulario para crear una nueva reservación.
     */
    public function create()
    {
        $rooms = Room::all();
        return view('reservations.create', compact('rooms'));
    }

    /**
     * Almacenar una nueva reservación en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id'    => 'required|exists:rooms,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $startTime = Carbon::parse($request->start_time);
        $endTime   = $startTime->copy()->addHour();

        // Verificar si la sala ya está reservada en ese horario
        $exists = Reservation::where('room_id', $request->room_id)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('start_time', [$startTime, $endTime])
                      ->orWhereBetween('end_time', [$startTime, $endTime])
                      ->orWhere(function ($query) use ($startTime, $endTime) {
                          $query->where('start_time', '<=', $startTime)
                                ->where('end_time', '>=', $endTime);
                      });
            })
            ->exists();

        if ($exists) {
            return back()->withErrors('La sala ya está reservada en ese horario.');
        }

        Reservation::create([
            'user_id'    => auth()->id(),
            'room_id'    => $request->room_id,
            'start_time' => $startTime,
            'end_time'   => $endTime,
            'status'     => 'Pendiente',
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservación creada exitosamente.');
    }

    /**
     * Mostrar todas las reservaciones para el administrador, con opción de filtrar por sala.
     */
    public function adminIndex(Request $request)
    {
        $query = Reservation::with('user', 'room');

        if ($request->has('room_id') && $request->room_id != '') {
            $query->where('room_id', $request->room_id);
        }

        $reservations = $query->get();
        $rooms        = Room::all();

        return view('admin.reservations.index', compact('reservations', 'rooms'));
    }

    /**
     * Actualizar el estado de una reservación.
     */
    public function updateStatus(Request $request, Reservation $reservation)
    {
        $request->validate([
            'status' => 'required|in:Pendiente,Aceptada,Rechazada',
        ]);

        $reservation->status = $request->status;
        $reservation->save();

        return back()->with('success', 'Estado de la reservación actualizado.');
    }
}
