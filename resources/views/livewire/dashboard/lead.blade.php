<div>
    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">

                @foreach ($leads as $lead)
                <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title">{{$lead['label']}}</h6>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-12 col-xl-5">
                                    <h4 class="mb-2">{{$lead['data']}} <sub>Buah</sub></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5>Overview Lead</h5>
                </div>
                <div class="card-body" style="height: 350px">
                    <h2 class="card-title">Total Lead {{date('Y')}}</h2>
                    <canvas id="overview"></canvas>
                </div>
                <button type="button" class="btn btn-primary d-none init-chart" wire:click="initChart"></button>
            </div>
        </div>
    </div>
</div>
