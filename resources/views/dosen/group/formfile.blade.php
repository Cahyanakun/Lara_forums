                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('dosen.file.upload') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        <input type="hidden" name="group_id" value="{{ token() }}">
                        <div class="form-group {{ !$errors->has('title') ?: 'has-error' }}">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                            <span class="help-block text-danger">{{ $errors->first('title') }}</span>
                        </div>

                        <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                            <label>File</label>
                            <input type="file" name="file">
                            <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>