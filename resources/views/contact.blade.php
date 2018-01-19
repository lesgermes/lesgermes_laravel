@extends('layouts.layout')

@section('content')
    <section>
        <div class="container">
            <h3 class="text-center">Contact</h3>

            <div class="row">
                <div class="col-md-7 offset-md-3 col-sm-10 offset-sm-1 col-xs-12">
                    <ul class="contact-info">
                        <li>Email: <a href="mailto:collectiflesgermes@gmail.com">collectiflesgermes@gmail.com</a></li>
                        <li>Téléphone: <a href="tel:+33630702669">0630702669</a></li>
                    </ul>
                </div>
            </div>

            <h3 class="text-center">Une question ?</h3>

            <div class="row">
                <div class="col-md-7 offset-md-3 col-sm-10 offset-sm-1 col-xs-12">
                    {!! Form::open(['url' => 'contact', 'method' => 'post', 'class' => 'form-contact', 'id' => 'contact-form']) !!}
                    {!! Form::label('name', 'Nom*') !!}
                    {!! Form::text('name', $value = null, $attributes = ['required' => true]) !!}
                    {!! Form::label('email', 'Email*') !!}
                    {!! Form::email('email', $value = null, $attributes = ['required' => true]) !!}
                    {!! Form::label('website', 'Site web') !!}
                    {!! Form::text('website', $value = null) !!}
                    {!! Form::label('message', 'Message*') !!}
                    {!! Form::textarea('message', null, ['size' => '30x5']) !!}
                    {!! Form::submit('Envoyer') !!}
                    {!! Form::close() !!}
                </div>
            </div>

            <div id="contact-alerts"></div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('js/contact.js')}}"></script>
@endsection