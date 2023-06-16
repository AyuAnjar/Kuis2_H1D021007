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
    
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                  <div>
                      <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('/') }}'">
                        <i class="fas fa-arrow-left"></i> Kembali
                      </button>
                    </div>
                <div class="card-header">
                  <h3 class="card-title">Form Edit Data Tugas</h3>
                </div>
                <div class="container mt-5 mb-5">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="card border-0 shadow-sm rounded">
                              <div class="card-body">
                                  <form action="{{ url('update', $task->id) }}" method="POST" enctype="multipart/form-data">
                                  
                                      @csrf
                                      @method('PUT')
  
                                    <div class="form-group">
                                      <label class="font-weight-bold">Judul</label>
                                      <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $task->judul) }}" placeholder="Masukkan Judul">
                                    </div>
  
                                  <div class="form-group">
                                    <label class="font-weight-bold">Deskripsi</label>
                                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi', $task->deskripsi) }}" placeholder="Masukkan Deskripsi">
                                </div>
                                <br>
                                <div class="form-group">
                                  <label class="font-weight-bold">Status</label>
                                  <select name="status" id="status">
                                    @foreach ($list as $list)
                                    @if ($list == $task->status)
                                    <option value="{{ $list }}"selected>{{ $list }}</option>
                                    @else
                                    <option value="{{ $list }}">{{ $list }}</option>
                                    @endif
                                    @endforeach
                                  </select>
                              </div>
                              <br>
                                      <button type="submit" class="btn btn-md btn-primary"><i class="fas fa-check"></i> UPDATE</button>
          
                                  </form> 
                              </div>
                          </div>
                      </div>
                  </div>
              </div> 
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>