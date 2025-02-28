<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PostRepositoryInterface;
use App\Models\Post;

class PostController extends Controller
{

    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        
        // dd(   $posts );
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048', 
        ]);

        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('uploads', 'public'); 
            $data['file_path'] = $filePath; 
        }
    
        Post::create($data);
    
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    
    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
        $this->postRepository->update($id, $data);
        return redirect()->route('posts.index');
    }

    public function destroy($id)
    {
        $this->postRepository->delete($id);
        return redirect()->route('posts.index');
    }
}
