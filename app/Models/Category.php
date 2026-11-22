<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * 
 * @property int $category_id
 * @property string $name
 * @property string|null $description
 * @property string|null $type // Agregar tipo de categoría
 *
 * @property Product[] $products
 *
 * @package App\Models
 */
class Category extends Model
{
    protected $table = 'categories'; // Nombre de la tabla
    protected $primaryKey = 'category_id'; // Clave primaria
    public $timestamps = false; 

    protected $casts = [
        'category_id' => 'int', // Tipo de dato para category_id
        'type' => 'string', // Tipo de dato para type
    ];

    protected $fillable = [
        'name', // Atributos que se pueden asignar masivamente
        'description',
        'type', // Añadir type a fillable
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id'); // Relación con productos
    }
}