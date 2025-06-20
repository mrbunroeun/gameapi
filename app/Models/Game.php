<?php
// app/Models/Game.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;    // Import BelongsTo
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Import BelongsToMany

class Game extends Model
{
    use HasFactory;

    protected $table = 'games'; // Explicitly defining table name (good practice, optional if plural)

    // Updated fillable properties to match your SQL migration
    protected $fillable = [
        'title',
        'genre',
        'rating',
        'class',
        'description',    // Added description
        'release_date',   // Added release_date
        'publisher_id',   // Foreign key must also be fillable if set during creation
    ];

    /**
     * A Game belongs to a Publisher (Inverse of One-to-Many).
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    /**
     * A Game can have many Developers (Many-to-Many relationship).
     * The pivot table is 'game_developer'.
     */
    public function developers(): BelongsToMany // Changed to plural 'developers'
    {
        // Explicitly defining the pivot table name and foreign keys for clarity.
        // 'game_developer' is the pivot table name
        // 'game_id' is the foreign key on the pivot table for this model (Game)
        // 'developer_id' is the foreign key on the pivot table for the related model (Developer)
        return $this->belongsToMany(Developer::class, 'game_developer', 'game_id', 'developer_id');
    }
}