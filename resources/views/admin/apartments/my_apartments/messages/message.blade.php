@extends('layouts.app')

@section('head-title')
    @yield('page-title')
@endsection

@section('content')

<section class="container">
    <div class="row">

        <h1 class="mt-4 mb-4">
            Your messages...
        </h1>
        
        
        @forelse ($apartment->leads as $message )
            
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>
                        Send to
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                       Messages
                    </th>
                    <th>
                        Date
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $apartment->leads as $message )  ?>
                    <tr>
                        <td>
                            {{ $message->name }}
                        </td>
                        <td>
                            {{ $message->email }}
                        </td>
                        <td>
                            {{ $message->message }}
                        </td>
                        <td>
                            {{ $message->date }}
                        </td>
                        
                    </tr>
                
            </tbody>
        </table>
        @empty
            <p>
                There are no messages....
            </p>
        @endforelse
    </div>

</section>

    
@endsection




{{-- @forelse ( $apartment->leads as $message)
        <li>                                 
            <p class="m-0">messaggio da:{{ $message->name }}</p>                                 
            <p>{{ $message->message }}</p>                             
        </li>
        
    @empty
        <p>
            There are no messages....
        </p>
    @endforelse --}}