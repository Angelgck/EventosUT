<?php

namespace App\Livewire;

use App\Models\Evento;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function registrar(Evento $evento)
    {
        if ($evento->max_participantes && $evento->participantes()->count() >= $evento->max_participantes) {
            return;
        }

        if ($evento->participantes->contains(Auth::user())) {
            return;
        }

        $evento->participantes()->attach(Auth::id());
    }

    public function cancelarRegistro(Evento $evento)
    {
        $evento->participantes()->detach(Auth::id());
    }

    public function render()
    {
        $eventos = Evento::withCount('participantes')->latest()->get();
        
        $eventosInscritosIds = Auth::user()->eventosInscritos()->pluck('eventos.id')->toArray();

        return view('livewire.dashboard', [
            'eventos' => $eventos,
            'eventosInscritosIds' => $eventosInscritosIds,
        ])->layout('components.layouts.app'); // <-- ASEGÚRATE DE QUE ESTA LÍNEA ESTÉ ASÍ
    }
}