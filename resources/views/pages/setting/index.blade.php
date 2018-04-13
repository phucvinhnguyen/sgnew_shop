@extends('layouts.admin')

@section('content')
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="#"><i class="fa fa-home"></i> Trang chính</a></li>
                <li><a href="#">Cài đặt</a></li>
            </ul>
            <div class="m-b-md">
                <h3 class="m-b-none">Cài đặt hệ thống</h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @include('pages.setting.tabsetting')
                </div>
            </div>
        </section>
    </section>
    @include('pages.setting.modal.refraction.add-refraction')
    @include('pages.setting.modal.refraction.edit-refraction')
    @include('pages.setting.modal.refraction.del-refraction')
@endsection

@section('embed-scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('.btn-refraction-edit').click(function () {
                var refractionId = $(this).data('id');
                var refractionTitle = $(this).data('title');
                var editModal = $("#edit-refraction-modal");

                editModal.find('.refraction-id').val(refractionId);
                editModal.find('.refraction-title').val(refractionTitle);
                editModal.modal('show');
            });

            $('.btn-refraction-del').click(function () {
                var refractionId = $(this).data('id');

                var deleteModal = $('#del-refraction-modal');
                deleteModal.find('.refraction-id').val(refractionId);
                deleteModal.modal('show');
            })

        })
    </script>
@endsection