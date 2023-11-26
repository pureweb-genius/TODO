<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    //store $data and handle exception
    public function store($data){
      try {
            return Todo::create($data);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
  }

  //update and handle exception
    public function update($data, $id){
        try {
            $todo = $this->find($id);
            $todo->update($data);

            return $todo;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
  //delete $data and handle exception
    public function delete($id){
        $todo = $this->find($id);
        return $todo->delete();
    }

    //get $data and handle exception
    public function find($id){
        return Todo::findOrFail($id);
    }
}
