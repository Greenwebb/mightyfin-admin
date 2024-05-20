<div class="content-body my-4">
    <div class="container-fluid">
        <div class="col-12">


            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Next of Kins</h4>
                </div>
                <div class="card-body pb-0">
                    <div id="guarantor_table_print_view" class="table-responsive">
                        <div wire:ignore class="actions-btns col-xl-12">
                            <div class="alert alert-dark alert-dismissible fade show">
                                {{-- <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button> --}}
                                <div class="media">
                                    <div class="media-body">
                                        <small class="mb-0">List of all Guarantors with respective borrowers.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table wire:ignore id="example3" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    {{-- <th>Client</th> --}}
                                    <th>Relation</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($noks as $user)
                                    @if ($user->fname != null && $user->lname != null)
                                        <tr>
                                            <td>{{ $user->fname.' '.$user->lname }} </td>
                                            <td>{{ $user->gender }}</td>
                                            <td>{{ $user->phone ?? '--' }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->gemail }}</strong></a></td>
                                            {{-- <td><a href="javascript:void(0);"><strong>{{ $user->user->fname.' '.$user->user->lname }}</strong></a></td> --}}
                                            <td>{{ $user->relation }}</td>
                                        </tr>
                                    @endif
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
                                        <p>No User Found</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        @if (Session::has('attention'))
                        <div class="actions-btns alert alert-info solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-check"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button> {{ Session::get('attention') }}
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div class="actions-btns alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Error!</strong> {{ Session::get('error_msg') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">References</h4>
                </div>
                <div class="card-body pb-0">
                    <div id="guarantor_table_print_view" class="table-responsive">
                        <div wire:ignore class="actions-btns col-xl-12">
                            <div class="alert alert-dark alert-dismissible fade show">
                                {{-- <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close"><span><i class="fa-solid fa-xmark"></i></span>
                                </button> --}}
                                <div class="media">
                                    <div class="media-body">
                                        <small class="mb-0">List of all Guarantors with respective borrowers.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table wire:ignore id="example3" class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>HR Names</th>
                                    <th>HR Contact</th>
                                    <th>Supervisor Names</th>
                                    <th>Supervisor Contact</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($refs as $user)
                                        <tr>
                                            <td>{{ $user->hrFname.' '.$user->hrLname }} </td>
                                            <td>{{ $user->hrContactNumber }}</td>
                                            <td>{{ $user->supervisorFirstName.' '.$user->supervisorLastName }}</td>
                                            <td><a href="javascript:void(0);"><strong>{{ $user->supervisorContactNumber }}</strong></a></td>
                                        </tr>
                                @empty
                                <div class="intro-y col-span-12 md:col-span-6">
                                    <div class="box text-center">
                                        <p>No User Found</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        @if (Session::has('attention'))
                        <div class="actions-btns alert alert-info solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-check"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button> {{ Session::get('attention') }}
                        </div>
                        @elseif (Session::has('error_msg'))
                        <div class="actions-btns alert alert-danger solid alert-end-icon alert-dismissible fade show">
                            <span><i class="mdi mdi-help"></i></span>
                            <button type="button" class="btn-close" data-dismiss="alert" aria-label="btn-close">
                            </button>
                            <strong>Error!</strong> {{ Session::get('error_msg') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
<!-- html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (e) {
        $('#prof_image_create').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload_create').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });

    function printGuarantorsTable(){
        $('.actions-btns').hide();
        // Get the HTML element that you want to convert to PDF
        const element = document.getElementById('guarantor_table_print_view');
        // Create a new jsPDF instance
        const doc = new jsPDF('potrait');
        // Use the html2canvas library to render the element as a canvas
        html2canvas(element).then(canvas => {
            // Convert the canvas to an image data URL
            const imgData = canvas.toDataURL('image/png');
            // Add the image data URL to the PDF document
            doc.addImage(
                imgData,
                'PNG',
                2, // x-coordinate
                2, // y-coordinate
            );

            // Save the PDF document
            doc.save('Guarantors.pdf');

            $('.actions-btns').show();
        });
    }
</script>
