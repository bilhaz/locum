<style>
    .select2-results__options {
        display: none;
    }
    .note-editor .note-editable {
      height: 200px; /* Set your desired height here */
    }
    .select2-selection__placeholder {
      opacity: 60.5; /* Set the desired opacity value */
    }
</style>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header py-lg-4 py-3">
            <div class="row g-3">
                <div class="col-md-6 col-sm-12">
                    <h2 class="m-0 fs-5"><a href="javascript:void(0);" class="btn btn-sm btn-link ps-0 btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Compose</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= base_url('emails/compose') ?>" method="post" enctype="multipart/form-data" accept-charset="utf-8" data-parsley-validate="" id="forma">
                            <div class="mb-3">
                                <select type="text" name="email" class="form-control" id="emailTags" multiple="multiple" placeholder="To"></select>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="mb-3">
                                <select type="text" name="cc" class="form-control" id="ccTags" multiple="multiple" placeholder="CC"></select>
                            </div>
                            <div class="mb-3">
                                <select type="text" name="bcc" class="form-control" id="bccTags" multiple="multiple" placeholder="BCC"></select>
                            </div>
                        <hr>
                        <textarea class="summernote" name="body" data-placeholder="Email Body" height="40%">

                            </textarea>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-success">Send Mail</button>
                            <a href="<?= base_url('emails/inbox')?>" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();
        $('.note-editor .note-btn').on('click', function() {
            $(this).next().toggleClass("show");
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Custom email validation function using regular expression
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        $('#emailTags').select2({
            tags: true,
            tokenSeparators: [',', ' '], // Define separators for multiple tags
            placeholder: 'To',
            minimumResultsForSearch: Infinity, // Disable search functionality
            maximumSelectionLength: 1, // set maximum number of tags
        }).on('select2:selecting', function(e) {
            const email = e.params.args.data.id;
            if (!validateEmail(email)) {
                e.preventDefault(); // Prevent the tag from being added
                alert('Invalid email address!');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Custom email validation function using regular expression
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        $('#ccTags').select2({
            tags: true,
            tokenSeparators: [',', ' '], // Define separators for multiple tags
            placeholder: 'CC',
            minimumResultsForSearch: Infinity, // Disable search functionality
            maximumSelectionLength: 1, // set maximum number of tags
        }).on('select2:selecting', function(e) {
            const email = e.params.args.data.id;
            if (!validateEmail(email)) {
                e.preventDefault(); // Prevent the tag from being added
                alert('Invalid email address!');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Custom email validation function using regular expression
        function validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

        $('#bccTags').select2({
            tags: true,
            tokenSeparators: [',', ' '], // Define separators for multiple tags
            placeholder: 'BCC',
            minimumResultsForSearch: Infinity, // Disable search functionality
            maximumSelectionLength: 1, // set maximum number of tags
        }).on('select2:selecting', function(e) {
            const email = e.params.args.data.id;
            if (!validateEmail(email)) {
                e.preventDefault(); // Prevent the tag from being added
                alert('Invalid email address!');
            }
        });
    });
</script>