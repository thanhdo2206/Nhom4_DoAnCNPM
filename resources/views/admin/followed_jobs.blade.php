@extends('layouts.dashboard')


@section('content')
<div class="row">
    <div class="col-md-12">

        @if($followedJobs->count())
        <table class="table table-bordered">

            <tr>
                <th>Your Information</th>
                <th>Employer</th>
                <th>Action</th>

            </tr>

            @foreach($followedJobs as $followedJob)
            <tr>
                <td>
                    <!-- xem lai, minh muon lay tu DB user lay len -->
                    <p class="text-muted"><i class="la la-clock-o"></i> {{$followedJob->created_at->format(get_option('date_format'))}} {{$followedJob->created_at->format(get_option('time_format'))}}</p>
                    <p class="text-muted"><i class="la la-envelope-o"></i> {{$followedJob->user->email}}</p>
                    <p class="text-muted"><i class="la la-phone-square"></i> {{$followedJob->user->phone}}</p>
                </td>

                <td>
                    @if( !empty($followedJob->job->job_title))
                    <p>
                        <a href="{{route('job_view', $followedJob->job->job_slug)}}" target="_blank">{{$followedJob->job->job_title}}</a>
                    </p>
                    @endif

                    @if( ! empty($followedJob->job->employer->company))
                    <p>{{$followedJob->job->employer->company}}</p>
                    @endif
                </td>

                <td>

                    @if($followedJob->job->employer->followable)
                    @if(auth()->check() && auth()->user()->isEmployerFollowed($followedJob->job->employer->id))
                    <button type="button" class="btn btn-success employer-follow-button" data-job-id="{{$followedJob->job->id}}" data-employer-id="{{$followedJob->job->employer->id}}"><i class="la la-minus-circle"></i> @lang('app.unfollow') </button>
                    @else
                    <button type="button" class="btn btn-success applicant-follow-button" data-job-id="{{$followedJob->job->id}}" data-employer-id="{{$followedJob->job->employer->id}}"><i class="la la-plus-circle"></i> @lang('app.follow') </button>
                    @endif
                    @endif

                </td>


            </tr>
            @endforeach
        </table>

        @else
        <div class="row">
            <div class="col-md-12">
                <div class="no data-wrap py-5 my-5 text-center">
                    <h1 class="display-1"><i class="la la-frown-o"></i> </h1>
                    <h1>No Data available here</h1>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>



@endsection

