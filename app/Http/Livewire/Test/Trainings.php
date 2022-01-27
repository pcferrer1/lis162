<?php

namespace App\Http\Livewire\Test;

use Livewire\Component;
use App\Models\Training;
use Livewire\WithPagination;

class Trainings extends Component
{
    use WithPagination;

        // public $trainingRecord = new Training();
    public $addRecordModal = 0, $deleteModal = 0;
    public $trainingRecords, $title, $author, $category, $content, $trainingID;
    public $deleteIDrecord;
    public $formTitle;
    // public $records;

    public $searchQuery = '';
    // $trainingRecord->title = 'Test';

    // public function mount(Training $trainingRecord) {
    //     $trainingRecord->title = 'test';
    // }

    // public function mount()
    // {
        
    //     // $this->records = Training::paginate(5);
    // }

    // protected $paginationTheme = 'bootstrap';

    public function render()
    {
        // $this->trainingRecords = Training::all();
        // $this->records = Training::paginate(5);
        // $this->records = Training::all();
        // $searchQuery = '%' . $this->searchQuery . '%';
        // $this->records = Training::where('title', 'ilike', $searchQuery)->get();
        // $this->records = Training::search('chess')->paginate(15);
        return view('livewire.test.training', [
            'records' => Training::search($this->searchQuery)
                ->paginate(5)
        ]);
            // ->layout('layouts.base');
    }

    // public function hydrate()
    // {
    //     dd('Hey');
    // }

    private function resetForm()
    {
        $this->title = '';
        $this->author = '';
        $this->category = '';
        $this->content = '';
        $this->trainingID = '';
    }

    public function openAddRecordModal() {
        $this->formTitle = 'Add Record';
        $this->resetForm();
        $this->addRecordModal = 1;
    }

    public function closeAddRecordModal() {
        $this->addRecordModal = 0;
    }

    // public function clearForm() 
    // {
    //     $this->title = '';
    //     $this->author = '';
    //     $this->category = '';
    //     $this->content = '';
    //     $this->trainingID = null;
    // }

    public function store()
    {
        // dd($this->category);
        // dd($this->title);
        $this->validate([
            'title' => 'required',
            'author' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);
    
        Training::updateOrCreate(['id' => $this->trainingID], [
            'title' => $this->title,
            'author' => $this->author,
            'subject' => $this->category,
            'content' => $this->content,
        ]);

        session()->flash('message', $this->trainingID ? 'Record updated.' : 'Record created.');
        $this->trainingID = '';
        $this->addRecordModal = 0;
        $this->resetForm();
    }

    public function edit($id) 
    {
        $this->formTitle = 'Edit Record';

        $editRecord = Training::findOrFail($id);
        $this->trainingID = $id;
        $this->title = $editRecord->title;
        $this->author = $editRecord->author;
        $this->category = $editRecord->subject;
        $this->content = $editRecord->content;
        
        // $this->openaddRecordModal();
        $this->addRecordModal = 1;
    }

    public function setDeleteRecord($id)
    {
        $this->deleteIDrecord = $id;
    }

    public function openDeleteModal($id) 
    {
        $this->deleteModal = 1;
        $this->deleteIDrecord = $id;
    }

    public function testFunc()
    {
        dd('jey');
    }

    public function closeDeleteModal() 
    {
        $this->deleteModal = 0;
    }

    public function delete($id)
    {
        Training::find($id)->delete();
        $this->closeDeleteModal();
        $this->deleteAlert();

    }

    public function show($id)
    {
        // $this->trainingRecords = Training::where('id', $id)->get();
        // return redirect()->route('trainingupdates.show', ['trianingupdaet' => 4]);
        return redirect()->route('trainingupdates.show');
    }


    // Alerts Messages

    public function successAlert()
    {
        session()->flash('createMessage', 'Record has been added successfully!');
    }

    public function editAlert()
    {
        session()->flash('editMessage', 'Record has been updated successfully!');
    }

    public function deleteAlert()
    {
        session()->flash('deleteMessage', 'Record has been deleted successfully!');
    }

    public function closeToast()
    {
        session()->flash('createMessage', '');
        session()->flash('editMessage', '');
        $this->emit('alert_remove');

    }

}
