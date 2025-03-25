<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'api';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'usuario',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    //definir reglas
    public static $rules = [
        'usuario' => 'required|string|max:255',
        'primer_nombre' => 'required|string|max:255',
        'segundo_nombre' => 'nullable|string|max:255',
        'primer_apellido' => 'required|string|max:255',
        'segundo_apellido' => 'nullable|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
    ];

    //definir reglas de mensajes

    public static $messages = [
        'usuario.required' => 'El usuario es requerido',
        'usuario.string' => 'El usuario debe ser una cadena de texto',
        'usuario.max' => 'El usuario no debe exceder los 255 caracteres',
        'primer_nombre.required' => 'El primer nombre es requerido',
        'primer_nombre.string' => 'El primer nombre debe ser una cadena de texto',
        'primer_nombre.max' => 'El primer nombre no debe exceder los 255 caracteres',
        'segundo_nombre.string' => 'El segundo nombre debe ser una cadena de texto',
        'segundo_nombre.max' => 'El segundo nombre no debe exceder los 255 caracteres',
        'primer_apellido.required' => 'El primer apellido es requerido',
        'primer_apellido.string' => 'El primer apellido debe ser una cadena de texto',
        'primer_apellido.max' => 'El primer apellido no debe exceder los 255 caracteres',
        'segundo_apellido.string' => 'El segundo apellido debe ser una cadena de texto',
        'segundo_apellido.max' => 'El segundo apellido no debe exceder los 255 caracteres',
        'email.required' => 'El email es requerido',
        'email.string' => 'El email debe ser una cadena de texto',
        'email.email' => 'El email debe ser un correo electrónico válido',
        'email.max' => 'El email no debe exceder los 255 caracteres',
        'email.unique' => 'El email ya se encuentra registrado',
        'password.required' => 'La contraseña es requerida',
        'password.string' => 'La contraseña debe ser una cadena de texto',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres',
    ];

    protected $appends = ['nombre_completo'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Devolver al usuario autenticado, sus roles y permisos.
     *
     * @return User
     */
    public function responseUser(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->primer_nombre,
            'email' => $this->primer_apellido,
            'roles' => $this->getRoleNames(),
            'permisos' => $this->getAllPermissions()->map(function ($permission) {
                return [
                    'accion' => $permission->name, // Acción que el usuario puede realizar
                    'recurso' => $permission->subject // Puedes cambiar esto por el recurso correcto
                ];
            })->toArray(),
        ];
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('Super Admin');

    }

    public function getNombreCompletoAttribute()
    {
        return $this->primer_nombre . ' ' . $this->segundo_nombre . ' ' . $this->primer_apellido . ' ' . $this->segundo_apellido;

    }


}
