@extends('layouts.dashboard')


@section('content')
<div class="row">
    <div class="col-md-12">

        @if($applications->count())
        <table class="table table-bordered">

            <tr>
                <th>Your Information</th>
                <th>@lang('app.employer')</th>
                <th>Status Apply</th>
                
            </tr>

            @foreach($applications as $application)
            <tr>
                <td>
                    <!-- xem lai, minh muon lay tu DB user lay len -->
                    <p class="text-muted"><i class="la la-clock-o"></i> {{$application->created_at->format(get_option('date_format'))}} {{$application->created_at->format(get_option('time_format'))}}</p>
                    <p class="text-muted"><i class="la la-envelope-o"></i> {{$application->email}}</p>
                    <p class="text-muted"><i class="la la-phone-square"></i> {{$application->phone_number}}</p>
                </td>

                <td>
                    @if( !empty($application->job->job_title))
                    <p>
                        <a href="{{route('job_view', $application->job->job_slug)}}" target="_blank">{{$application->job->job_title}}</a>
                    </p>
                    @endif

                    @if( ! empty($application->job->employer->company))
                    <p>{{$application->job->employer->company}}</p>
                    @endif
                </td>

                <td>
                    {!! $application->statusApply_context() !!}
                </td>


            </tr>
            @endforeach
        </table>
        {!! $applications->links() !!}
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