<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form and Table Layout with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <!-- Form on the Left Side -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @isset($editSalatTime)
                    <form action="{{route('salat-times.update',$editSalatTime->id)}}" method="POST">
                        @method('PUT')
                    @else
                    <form action="{{route('salat-times.store')}}" method="POST">
                    @endisset
                    @csrf
                        <div class="mb-3">
                            <label for="time" class="form-label">Time</label>
                            <input type="time" value="{{isset($editSalatTime) ? $editSalatTime->time : ''}}" class="form-control" id="time" name="time" required>
                           
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">type</label>
                            <select class="form-select" id="type" name="type" required>
                                @foreach ($types as $type)
                                    
                                <option value="{{$type}}" {{isset($editSalatTime) ? $editSalatTime->type == $type ? 'selected':'':''}}>{{ucfirst($type)}}</option>
                                @endforeach

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">{{isset($editSalatTime) ? 'Update':'Submit'}}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Table on the Right Side -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">SL</th>
                                <th scope="col">Name</th>
                                <th scope="col">Time</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salatTimes as $item)
                                
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ucfirst($item->type)}}</td>
                                <td>{{$item->time}}</td>
                                <td>
                                    <div class="d-flex">
                                    <a href="{{route('salat-times.edit',$item->id)}}">
                                        <button class="btn btn-success btn-sm me-2">Edit</button>
                                    </a>
                                    <form method="POST" action="{{route('salat-times.delete',$item->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                      </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            <!-- Additional rows can be added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS (optional for Bootstrap functionality) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
