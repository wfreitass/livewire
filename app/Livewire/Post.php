<?php

namespace App\Livewire;

use App\Models\Post as Posts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Post extends Component
{

    public Collection $posts;

    #[Rule('required')] 
    public string $title;
    
    #[Rule('required')] 
    public string $description;
    
    public int $postId;
    public bool $updatePost = false;
    public bool $addPost = false;

    protected $listeners = [
        'deletePostListner' => 'deletePost'
    ];


    public function resetFields(){
        $this->title = "";
        $this->description = "";
    }

    public function render(): View
    {
        $this->posts = Posts::all();
        return view('livewire.post')->layout('layouts.app');
    }

    public function addPost(){
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }

    public function storePost(){
        $this->validate();

        try {
            Posts::create([
                'title'=> $this->title,
                'description'=> $this->description,
            ]);
            session()->flash('success', 'Post Criado com sucesso');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Throwable $th) {
            session()->flash('error', 'Não foi possível criar o Post');
        }
    }

    public function editPost($id) : void {
        try {
            $post = Posts::findOrFail($id);

            if(!$post){
                session()->flash('error', 'Post Não encontrado');
            }else{
                $this->title = $post->title;
                $this->description = $post->description;
                $this->postId = $post->id;
                $this->updatePost = true;
                $this->addPost = false;
            }

        } catch (\Throwable $th) {
            session()->flash('error', 'Algo deu errado!');
        }
    }

    public function updatePost(){
        dd("a");

        $this->validate();
        try {
            Posts::whereId($this->postId)->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            session()->flash('success', 'Post Atualizado com sucesso');
            $this->resetFields();
            $this->updatePost == false;
        } catch (\Throwable $th) {
            session()->flash('error', 'Não foi possivel atualizar o seu Post');
        }
    }

    public function cancelPost(){
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    public function deletePost($id){
        try {
            Posts::find($id)->delete();
            session()->flash('success', 'Post deletedado com sucesso');
        } catch (\Throwable $th) {
            session()->flash('error', "Algo deu errado não foi possivel deletar o seu post");
        }
    }
}
