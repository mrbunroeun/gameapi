<?php
namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany; // Import BelongsToMany

class Developer extends Model
{
    use HasFactory;

    protected $table = 'developers'; // Explicitly defining table name (good practice, optional if plural)

    // Updated fillable properties to match the database table
    protected $fillable = [
        'name',
        'location', // Added location as per your SQL migration
    ];

    /**
     * A Developer can develop many Games (Many-to-Many relationship).
     * The pivot table is 'game_developer'.
     */
    public function games(): BelongsToMany
    {
        // Explicitly defining the pivot table name and foreign keys for clarity.
        // 'game_developer' is the pivot table name
        // 'developer_id' is the foreign key on the pivot table for this model (Developer)
        // 'game_id' is the foreign key on the pivot table for the related model (Game)
        return $this->belongsToMany(Game::class, 'game_developer', 'developer_id', 'game_id');
    }
}