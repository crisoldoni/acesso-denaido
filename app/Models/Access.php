<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Group;

class Access extends Model
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
        'rust_id',
        'password',
        'id_group',
        'id_person',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id_group' => 'integer',
        'id_person' => 'integer',
    ];

    /**
     * Define a tabela associada ao modelo.
     *
     * @var string
     */
    protected $table = 'accesses';

    /**
     * Relacionamento com o modelo Person.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(Person::class, 'id_person', 'id');
    }

    /**
     * Relacionamento com o modelo Group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'id_group', 'id');
    }
}
