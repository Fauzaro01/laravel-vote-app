@extends('layouts.main')

@section('title')
    Create VotePost
@endsection

@section('content')
<div class="row justify-content-center mt-5">
    <div class="w-75 p-3">
      <div class="card">
        <div class="card-header">Vote Form</div>
        <div class="card-body">
          <form id="voteForm" action="{{route('vote.store')}}" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="titleVote">Title Vote</label>
              <input class="form-control" name="title" id="titleBlog" type="text" placeholder="Tulis Ide mu disini" required />
            </div>
            <div class="mb-3">
              <label class="form-label" for="contentVote">Content Vote</label>
              <input class="form-control" name="content" id="contentVote" type="text" placeholder="Ilmu tanpa amal adalah kegilaan, dan amal tanpa ilmu adalah kesia-siaan." required />
            </div>
            
            <div class="mb-3">
              <label class="form-label" for="optionVote">Opsion Vote</label>
              <button class="btn btn-sm btn-outline-secondary" type="button" onclick="addOption()"><i class="bi bi-plus-circle"></i></button>
              <button class="btn btn-sm btn-outline-secondary" type="button" onclick="removeOption()"><i class="bi bi-dash-circle"></i></button><br>
              <div id="container-option">
                <input type="text" name="options[]" class="form-control mt-1" placeholder="Opsi 1" required>
              </div>
            </div>

            <div class="d-grid">
              <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    let number = 1;
    const optionsContainer = document.getElementById('container-option');

    function addOption() {
      number++
      const optionInput = document.createElement('input');
      optionInput.type = 'text';
      optionInput.name = 'options[]';
      optionInput.className = 'form-control mt-1';
      optionInput.required = true;
      optionInput.placeholder = `Opsi ${number}`
      optionsContainer.appendChild(optionInput)
    }

    function removeOption() {
      var lastInput = optionsContainer.lastChild;
      if (number > 1) {
        number--
        optionsContainer.removeChild(lastInput);
      }
    }
  </script>
@endsection