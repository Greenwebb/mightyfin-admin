<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">
            <div class="container">
                <h1>Loan opened successfully</h1>
                <img width="100" src="{{ asset('public/mfs/gif/discount-bag.gif') }}" alt="">
                <div style="width: 22%">
                    <a style="box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;" href="{{ route('detailed', $loan->id ) }}" class="btn btn-primary gap-2 d-flex space-x-1">
                        More Details
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671"/>
                              </svg>
                        </span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
