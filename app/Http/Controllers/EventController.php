<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Event::with('administrators')->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Custom messages
        $messages = [
            'name.required' => 'Por favor dale un nombre al evento.',
            'start_date.required' => 'Evento debe tener una fecha de inicio.',
            'end_date.required' => 'Evento debe tener una fecha de finalización',
            'end_date.after_or_equal' => 'La fecha de finalización no puede ser previa a la fecha de inicio',
        ];

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], $messages);
        try {


            // Convert start_date and end_date from UTC to America/Bogota (Colombia) timezone
            $startDateUtc = Carbon::parse($validatedData['start_date']); // Parse UTC date
            $endDateUtc = Carbon::parse($validatedData['end_date']); // Parse UTC date

            // Convert from UTC to America/Bogota timezone
            $validatedData['start_date'] = $startDateUtc->setTimezone('America/Bogota');
            $validatedData['end_date'] = $endDateUtc->setTimezone('America/Bogota');

            $event = Event::create($validatedData);
            //And assign the users for that event
            $administrators = $request->input('administrators');
            $event->administrators()->sync($administrators);
            return response()->json([
                'message' => 'Evento creado exitosamente',
                'event' => $event
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error creando evento',
                'message' => $th->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Custom messages for validation
        $messages = [
            'name.required' => 'Por favor dale un nombre al evento.',
            'start_date.required' => 'Evento debe tener una fecha de inicio.',
            'end_date.required' => 'Evento debe tener una fecha de finalización.',
            'end_date.after_or_equal' => 'La fecha de finalización no puede ser previa a la fecha de inicio.',
        ];

        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ], $messages);

        try {

            // Convert start_date and end_date from UTC to America/Bogota (Colombia) timezone
            $startDateUtc = Carbon::parse($validatedData['start_date']); // Parse UTC date
            $endDateUtc = Carbon::parse($validatedData['end_date']); // Parse UTC date

            // Convert from UTC to America/Bogota timezone
            $validatedData['start_date'] = $startDateUtc->setTimezone('America/Bogota');
            $validatedData['end_date'] = $endDateUtc->setTimezone('America/Bogota');

            // Find the event by ID
            $event = Event::findOrFail($id);

            // Update event with validated data
            $event->update($validatedData);

            // Update the associated administrators
            $administrators = $request->input('administrators');

            if ($administrators) {
                $event->administrators()->sync($administrators);
            }

            // Return success response
            return response()->json([
                'message' => 'Evento actualizado exitosamente',
                'event' => $event
            ]);

        } catch (\Throwable $th) {
            // Handle errors
            return response()->json([
                'error' => 'Error actualizando el evento',
                'message' => $th->getMessage()
            ], 400);
        }
    }

    public function getUserEvents(Request $request){

        $user = auth()->user();

        //Traerse los eventos EN CURSO, es decir que start date <= now y end date > now
        $userEvents = \DB::table('event_administrators')->where('user_id', $user->id)->get()->pluck('event_id')->toArray();

        //I have the user events, now I have to see if those events are EN CURSO
        $availableEvents = \DB::table('events')->whereIn('id', $userEvents)
            ->where('start_date', '<=', Carbon::now())
                ->where('end_date', '>', Carbon::now())->get();

        return response()->json($availableEvents);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::destroy($id);
        return response()->json(['message' => 'Evento borrado exitosamente']);
    }
}
