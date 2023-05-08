{{--@foreach($categories as $category)--}}


{{--    @if($category->level == 1)--}}



{{--        <div class="head{{$category->id}}   mt-3  align-items-start  px-3 w-100 h-100">--}}
{{--            @if($category->child)--}}
{{--                @foreach($category->child as $category)--}}

{{--                    <div class="head d-flex align-items-start justify-content-start flex-column mt-3 " style="width: 200px ; float: right">--}}
{{--                        <div class=" h-100 px-2 d-flex align-items-center justify-content-start" style="border-right: 2px solid red ; color: #6a6a6a ; height: 18px!important">--}}
{{--                            <strong>--}}
{{--                                {{$category->name}}--}}
{{--                            </strong>--}}

{{--                        </div>--}}

{{--                        @if($category->child)--}}
{{--                            @foreach($category->child as $category)--}}
{{--                                <div class="head d-flex align-items-start justify-content-start  flex-column  px-2 w-100 mt-2" style="color: #7f7f7f">--}}
{{--                                    {{$category->name}}--}}
{{--                                    @foreach($category->child as $category)--}}
{{--                                        <div class="head d-flex align-items-center justify-content-center flex-column">--}}
{{--                                            {{$category->name}}--}}
{{--                                            @foreach($category->child as $category)--}}
{{--                                                <div class="head d-flex align-items-center justify-content-center flex-column">--}}
{{--                                                    {{$category->name}}--}}
{{--                                                    @foreach($category->child as $category)--}}
{{--                                                        <div class="head d-flex align-items-center justify-content-center flex-column">--}}
{{--                                                            {{$category->name}}--}}
{{--                                                            @foreach($category->child as $category)--}}
{{--                                                                <div class="head d-flex align-items-center justify-content-center flex-column">--}}
{{--                                                                    {{$category->name}}--}}
{{--                                                                </div>--}}
{{--                                                            @endforeach--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}

{{--                    </div>--}}


{{--                    @if($category->child)--}}
{{--                        @foreach($category->child as $category)--}}

{{--                            <div class="head d-flex   border border-1">--}}
{{--                                {{$category->name}}--}}
{{--                            </div>--}}


{{--                            @if($category->child)--}}
{{--                                @foreach($category->child as $category)--}}

{{--                                    <div class="head d-flex  border border-1">--}}
{{--                                        {{$category->name}}--}}
{{--                                    </div>--}}


{{--                                    @if($category->child)--}}
{{--                                        @foreach($category->child as $category)--}}

{{--                                            <div class="head d-flex  border border-1">--}}
{{--                                                {{$category->name}}--}}
{{--                                            </div>--}}


{{--                                            @if($category->child)--}}
{{--                                                @foreach($category->child as $category)--}}

{{--                                                    <div class="head d-flex   border border-1">--}}
{{--                                                        {{$category->name}}--}}
{{--                                                    </div>--}}

{{--                                                    @if($category->child)--}}
{{--                                                        @foreach($category->child as $category)--}}

{{--                                                            <div class="head d-flex   border border-1">--}}
{{--                                                                {{$category->name}}--}}
{{--                                                            </div>--}}

{{--                                                            @if($category->child)--}}
{{--                                                                @foreach($category->child as $category)--}}

{{--                                                                    <div class="head d-flex   border border-1">--}}
{{--                                                                        {{$category->name}}--}}
{{--                                                                    </div>--}}

{{--                                                                @endforeach--}}
{{--                                                            @endif--}}

{{--                                                        @endforeach--}}
{{--                                                    @endif--}}

{{--                                                @endforeach--}}
{{--                                            @endif--}}


{{--                                        @endforeach--}}
{{--                                    @endif--}}


{{--                                @endforeach--}}
{{--                            @endif--}}


{{--                        @endforeach--}}
{{--                    @endif--}}


{{--                @endforeach--}}
{{--            @endif--}}
{{--        </div>--}}

{{--    @endif--}}
{{--@endforeach--}}
