<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Evento;

class GestionarEventos extends Component
{
    // Propiedades para el formulario
    public string $titulo = '';
    public string $descripcion = '';
    public string $fecha_inicio = '';
    public string $fecha_fin = '';
    public ?int $max_participantes = null;
    public ?float $horas_asignadas = null;

    // Método para crear un nuevo evento
    public function crearEvento(): void
    {
        $validated = $this->validate([
            'titulo' => ['required', 'string', 'min:5'],
            'descripcion' => ['required', 'string', 'min:20'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date', 'after_or_equal:fecha_inicio'],
            'max_participantes' => ['nullable', 'integer', 'min:1'],
            'horas_asignadas' => ['nullable', 'numeric', 'min:0'],
        ]);

        Evento::create($validated);

        $this->reset('titulo', 'descripcion', 'fecha_inicio', 'fecha_fin', 'max_participantes', 'horas_asignadas');
    }

    // Método para eliminar un evento
    public function eliminarEvento(int $eventoId): void
    {
        $evento = Evento::findOrFail($eventoId);
        $evento->delete();
    }
    
    // El método render se encarga de mostrar la vista y pasarle los datos
    public function render()
    {
        return view('livewire.gestionar-eventos', [
            'eventos' => Evento::latest()->get()
        ])->layout('components.layouts.app');
    }
}