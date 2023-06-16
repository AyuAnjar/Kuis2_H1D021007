<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>DATA TUGAS</title>
</head>
<body>
    <div class="card" align="center">
        <div class="card-header">
            <h3 class="card-title">Data Tugas Kuliah</h3>
        </div>
        <div>
            <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('create') }}'">
                <i class="fa-sharp fa-solid fa-plus"></i> Add New Data
            </button>
            <br><br>
            <button type="button" class="btn btn-sm btn-info" onclick="window.location='{{ url('/') }}'">
                Show All Task
           </button>
            <button type="button" class="btn btn-sm btn-success float-right" onclick="window.location='{{ url('completed') }}'">
                 Task Completed
            </button>
            <button type="button" class="btn btn-sm btn-warning float-right" onclick="window.location='{{ url('incomplete') }}'">
                Task Incomplete
           </button>
        </div>

    <div class="card-body">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $task->judul }}</td>
            <td>{{ $task->deskripsi }}</td>
            <td>{{ $task->status }}</td>
            <td>
                <form action="{{ route('tasks.updateStatus', [$task->id]) }}" method="post">
                    @csrf
                    @method('put')
                    @if ($task->status === 'Completed')
                    <button type="submit" class="btn btn-primary" value="{{ $task->status }}">Completed</button>
                    @else
                    <button type="submit" class="btn btn-secondary" value="{{ $task->status }}">Incomplete</button>
                    @endif
                </form>
            </td>
            <td>
                <form action="{{ url('delete', $task->id)}} " method="POST">
                  <a href="{{ url('edit', $task->id) }}" class="btn btn-md btn-warning">EDIT</a>
                  @csrf
                  @method("delete")
                  <button type="submit" class="btn btn-md btn-danger">HAPUS</button>
                </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>