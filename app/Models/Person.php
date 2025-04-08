<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Access;
use App\Models\Group;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Define se o modelo deve usar timestamps.
     *
     * @var bool
     */
    /**public $timestamps = false;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cpfcnpj',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cpfcnpj' => 'string',
    ];

    /**
     * Define a tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * Relacionamento com o modelo Access.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accesses()
    {
        return $this->hasMany(Access::class, 'id_person', 'id');
    }

    /**
     * Relacionamento com o modelo Group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany(Group::class, 'id_person', 'id');
    }
}
