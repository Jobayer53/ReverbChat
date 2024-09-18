<div>
    <div class="row clearfix">
        <div class="col-lg-12 ">
            <div class="card chat-app" style="border:none; box-shadow:none;">
                <div id="plist" class="people-list list-shadow">
                    {{-- <span class="count badge rounded-pill bg-danger"></span> --}}
                    <div class="input-group" style="margin: 9.8px; color:#606470">

                    </div>
                    <div class="chat-style">


                        <ul class="list-unstyled chat-list mt-2 mb-0" >
                            @foreach ($users as  $data)
                            <li wire:click="chatUser({{ $data->id }})" class="clearfix user {{ $data->gender == 'female' ? 'female' : '' }} " data-id="{{ $data->id }}" data-country="{{ $data->country }}" data-age="{{ $data->age }}" data-gender="{{ $data->gender }}" >
                                <div class="about d-flex align-items-baseline">
                                    <div class="me-2"><i class="" style="height: 15px; width: 15px; display:inherit">
                                        @if($data->gender == 'male')
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M289.8 46.8c3.7-9 12.5-14.8 22.2-14.8H424c13.3 0 24 10.7 24 24V168c0 9.7-5.8 18.5-14.8 22.2s-19.3 1.7-26.2-5.2l-33.4-33.4L321 204.2c19.5 28.4 31 62.7 31 99.8c0 97.2-78.8 176-176 176S0 401.2 0 304s78.8-176 176-176c37 0 71.4 11.4 99.8 31l52.6-52.6L295 73c-6.9-6.9-8.9-17.2-5.2-26.2zM400 80l0 0h0v0zM176 416a112 112 0 1 0 0-224 112 112 0 1 0 0 224z"/></svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" style=" fill: #f77d92;"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M80 176a112 112 0 1 1 224 0A112 112 0 1 1 80 176zM224 349.1c81.9-15 144-86.8 144-173.1C368 78.8 289.2 0 192 0S16 78.8 16 176c0 86.3 62.1 158.1 144 173.1V384H128c-17.7 0-32 14.3-32 32s14.3 32 32 32h32v32c0 17.7 14.3 32 32 32s32-14.3 32-32V448h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H224V349.1z"/></svg>
                                        @endif
                                    </i></div>
                                    <div class="name">{{ $data->name }} </div>

                                        {{-- @foreach($data->receivemessages->where('count', 1)->unique('receiver_id') as $message)
                                    @if($message->receiver_id == Auth::user()->id)
                                    <div class="text-primary ms-2 "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" style="height: 5px; width: 5px; fill:#168AFF"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512z"/></svg> </div>
                                    @endif
                                    @endforeach --}}
                                </div>
                            </li>
                            @endforeach



                        </ul>
                    </div>
                </div>
                <div class="welcome ">
                    <h5>Welcome to Disting Disting....</h5>
                    <p style="color:#323643">Tap to chat</p>
                </div>

                <div class="chat ">
                    @if($hide == true)
                    <div class=" convo ">
                        <div class="chat-header clearfix ">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="d-flex" style="padding-left: 10px;">

                                        <h5 class="m-b-0 username text-colour"> </h5>
                                        <span class="svg"></span>
                                    </div>
                                    <div class="chat-about" style="color:#606470">
                                        <span id="age"  style="font-size:13px;"></span>,
                                        <span id="country" style="font-size:13px;"></span>

                                    </div>
                                </div>
                                <div class="col-lg-6 hidden-sm text-right">
                                    <span class="float-end cross">
                                        <i class="cross-style" >
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>
                                        </i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div id="chat-interface" class="d-flex flex-column" style="height: 68vh;">
                            <div id="message-container" class="flex-1 overflow-y-auto"></div>
                            <div class="chat-message clearfix">
                                <div  class="input-style">

                                    @foreach ($messages as $message )
                                    @if($message['sender'] != auth()->user()->name)
                                    <p>{{ $message['sender'] }}: {{ $message['message'] }}</p>
                                    @else
                                    <p>{{ $message['sender'] }}: {{ $message['message'] }}</p>
                                    @endif
                                @endforeach

                                <form wire:submit="sendMessage()">
                                    <input type="text" wire:model="message">
                                    <button type="submit">send</button>
                                </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
