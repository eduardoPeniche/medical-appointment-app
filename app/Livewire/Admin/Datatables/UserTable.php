<?php

namespace App\Livewire\Admin\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    //protected $model = User::class;

    // Este metodo define el modelo
    public function builder(): Builder
    {
        return User::query()
            ->with('roles');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Email", "email")
                ->sortable(),
            Column::make("Numero ID", "id_number")
                ->sortable(),
            Column::make("Telefono", "phone")
                ->sortable(),
            Column::make("Rol", "roles")
                ->label(function ($row) {
                    return $row->roles->first()->name ?? 'Sin rol';
                }),
            Column::make("Acciones")
                ->label(function ($row) {
                    return view('admin.users.actions',
                        ['user' => $row]);
                })
        ];
    }
}
