<?php

namespace App\Models;

use App\Traits\Database;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Database;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'photo',
        'description',
    ];

    public function saveOrUpdate(array $data)
    {
        return $this->persist(Post::class, $data);
    }

    public function storeImage($request)
    {
        $file = $request->file('file');
        $nameFile = Str::uuid().".". $file->extension();
        $image = Image::make($file);
        $image->fit(1000, 1000);
        $imagenPath = public_path('uploads').'/'.$nameFile;
        $image->save($imagenPath);
        return $image;
    }

    public function destroyPost($post_id) : array
    {
        $data = [
            'status' => false,
            'message' => '',
            'data' => []
        ];

        $post = Post::find($post_id);
        if ($post) {
            $imagenPath = public_path('uploads').'/'.$post->photo;

            if (File::exists($imagenPath)) {
                unlink($imagenPath);
                $post->delete();
                $data['status'] = true;
                $data['message'] = 'Publicación Eliminada.';
                return $data;
            }
        }

        $data['message'] = 'Error al Eliminar Publicación.';

        return $data;
        
    }
}
