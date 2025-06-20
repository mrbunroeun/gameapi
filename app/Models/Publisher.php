<?php
namespace App\Models;
// publisher


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import HasMany

class Publisher extends Model
{
    use HasFactory;

    protected $table = 'publishers'; // Explicitly defining table name (good practice, optional if plural)

    // Updated fillable properties to match your SQL migration
    protected $fillable = [
        'name',
        'website',
        'headquarters_country', // Added headquarters_country
    ];

    /**
     * A Publisher has many Games (One-to-Many relationship).
     * The foreign key on the 'games' table is 'publisher_id'.
     */
    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'publisher_id');
    }
}