@extends('layout.master')

<style>
    .setcollapse {

        height: 100%;

    }
    
</style>
@section('course')
    <div class="container">
        <p>
            <a class="btn btn-outline-primary " data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
                aria-expanded="true" aria-controls="multiCollapseExample1">M.COM</a>
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2"
                aria-expanded="false" aria-controls="multiCollapseExample2">MCA</button>
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3"
                aria-expanded="false" aria-controls="multiCollapseExample2">LLM</button>
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4"
                aria-expanded="false" aria-controls="multiCollapseExample2">M Pharm</button>
            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5"
                aria-expanded="false" aria-controls="multiCollapseExample2">MBA</button>

            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample6"
                aria-expanded="false" aria-controls="multiCollapseExample2">MASTER OF ARTS </button>

            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample7"
                aria-expanded="false" aria-controls="multiCollapseExample2">MTech</button>

            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample8"
                aria-expanded="false" aria-controls="multiCollapseExample2">Mobile App Development</button>

            <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample9"
                aria-expanded="false" aria-controls="multiCollapseExample2">Diploma in Digital Marketing </button>

        </p>
    </div>
    {{-- About Course --}}
    <div class="setcollapse">
        <div class="row container">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample2">
                    <div class="card card-body">
                        Some placeholder content for the second collapse component of this multi-collapse example. This
                        panel is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample3">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample4">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample5">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-2">
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample6">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample7">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample8">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="collapse multi-collapse" id="multiCollapseExample9">
                    <div class="card card-body">
                        Some placeholder content for the first collapse component of this multi-collapse example. This panel
                        is
                        hidden by default but revealed when the user activates the relevant trigger.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
