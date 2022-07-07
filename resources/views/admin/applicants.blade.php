@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if($applications->count())
                <table class="table table-bordered">

                    <tr>
                        <th>@lang('app.name')</th>
                        <th>@lang('app.employer')</th>
                        <th>#</th>
                       
                    </tr>

                    @foreach($applications as $application)
                        <tr>
                            <td>
                                <i class="la la-user"></i> {{$application->name}}
                                <p class="text-muted"><i class="la la-clock-o"></i> {{$application->created_at->format(get_option('date_format'))}} {{$application->created_at->format(get_option('time_format'))}}</p>
                                <p class="text-muted"><i class="la la-envelope-o"></i> {{$application->email}}</p>
                                <p class="text-muted"><i class="la la-phone-square"></i> {{$application->phone_number}}</p>
                                <p class="text-muted"><i class="la la-phone-square"></i> {{$application->message}}</p>
                                <a href='http://127.0.0.1:8000/{{$application->resume}}'><i class="la la-book"></i> View CV</a>
                            </td>

                            <td>
                                @if( ! empty($application->job->job_title))
                                    <p>
                                        <a href="{{route('job_view', $application->job->job_slug)}}" target="_blank">{{$application->job->job_title}}</a>
                                    </p>
                                @endif

                                @if( ! empty($application->job->employer->company))
                                    <p>{{$application->job->employer->company}}</p>
                                @endif
                            </td>
                            <td>
                                <!-- @if( ! $application->is_shortlisted)
                                    <a href="{{route('make_short_list', $application->id)}}" class="btn btn-success"><i class="la la-user-plus"></i> @lang('app.shortlist') </a>
                                @else
                                    @lang('app.shortlisted')
                                @endif -->
                                    @if($application->statusApply == 0)
	                                    <a href="{{route('apllication_statusApply_change', [$application->id, 'accept'])}}" class="btn btn-success btn-sm" data-toggle="tooltip" title="accept"><i class="la la-check-circle-o"></i> </a>
	                                    <a href="{{route('apllication_statusApply_change', [$application->id, 'denied'])}}" class="btn btn-warning btn-sm" data-toggle="tooltip" title="denied"><i class="la la-ban"></i> </a>
                                    @endif

                                    @if($application->statusApply == 1)
	                                    <span class="text-success">Accept</span>
                                    @endif

                                    @if($application->statusApply == 2)
                                        <span class="text-danger">Denied</span>
                                    @endif
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