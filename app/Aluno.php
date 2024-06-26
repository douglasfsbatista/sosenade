<?php

namespace SimuladoENADE;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use SimuladoENADE\Notifications\PasswordReset;


class Aluno extends Authenticatable{
    Use Notifiable;

    protected $fillable = ['nome', 'email', 'password', 'cpf', 'curso_id'];
    protected $hidden = ['password', 'remember_token'];

    public function curso(){
        return $this->belongsTo('\SimuladoENADE\Curso', 'curso_id', 'id');
    }

    public function simulados_alunos(){
        return $this->hasMany('\SimuladoENADE\SimuladoAluno', 'aluno_id', 'id');
    }

    public function respostas(){
        return $this->hasMany('SimuladoENADE\Resposta');
    }

    public static $rules = [
    	'nome'  => 'required|',
    	'cpf' => 'required|min:14',
    	//'password' => 'required|min:8|confirmed',
    	'email' => 'required|email',
    	//'curso_id'  => 'required'
    ];

    public static $messages = [
    	'required' => 'O campo :attribute deve ser preenchido na forma correta',
        'cpf.min' => 'O :attribute deve conter no mínimo 14 caracteres',
        'password.min' => 'A senha deve conter no mínimo 8 caracteres',
        'email.email' => "O email deve ser um email valido",
        'unique' => "O :attribute já esta cadastrado no sistema!!",
        'password.confirmed' => "As senhas devem ser identicas",
        'same' => "As senhas devem ser identicas"
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
}
