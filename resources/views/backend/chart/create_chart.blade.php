@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <!-- Add Project -->
            <div class="modal fade" id="addProjectSidebar">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Create Chart </h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                <form method="post" action="{{ route('chart.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="info-title"> Techonology </label>
                                        <input type="text" name="techonology" class="form-control input-default ">
                                        @error('techonology')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label class="info-title"> Percentage </label>
                                        <input type="text" name="project" class="form-control input-default ">
                                        @error('project')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="info-title"> CSS Property </label>
                                        <input type="text" name="css_prop"
                                            class="form-control input-default ">Skills__</input>
                                        @error('css_prop')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <input type="submit" class="btn btn-success" value="Create Chart">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
