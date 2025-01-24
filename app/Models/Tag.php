<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Tag extends Model
{
    use HasFactory;

    /**
     * Define the many-to-many relationship with the Post model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
    public static function getTags()
    {
       
        if (Auth::check()) {
           
            return self::where('user_id', Auth::id())->get();
        }


        return collect();
    }
    public static function createTag($request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
        ]);
       
        // Add the authenticated user's ID to the validated data
        $validatedData['user_id'] = Auth::id();

        // Create and return the tag
        return self::create($validatedData);
    }
    protected $fillable = ['name', 'user_id']; // Corrected property name

}
