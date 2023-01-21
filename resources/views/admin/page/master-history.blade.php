@extends('layouts.main')
@section('title', 'Histori Skor')
@section('content')
    <div class="row justify-content-center">
        <div class="card shadow px-0">
            <div class="card-header">
                <h2 class="fw-bolder mt-2">
                    History
                </h2>
            </div>
            <div class="card-body py-0">
                @if ($histories->count())
                    @foreach ($tanggal as $tgl)
                        <p class="text-dark mb-1 mt-3 ml-2">{{ $tgl }}</p>
                        @foreach ($histories as $history)
                            @if ($history->getAttribute('tanggal') == $tgl)
                                <div class="list-group mb-2">
                                    <a href="/guru/histori/{{ $history->siswa->id }}"
                                        class="list-group-item  list-group-item-action flex-column align-items-start py-0"
                                        style="background-color: #f1f1f1;">
                                        <div class="d-flex w-100 mt-2 mb-1" style="justify-content: space-between;">
                                            <small>
                                                <b>{{ $history->siswa->nama }} -
                                                    @if ($history->siswa->kelas_id == 1)
                                                        12 RPL 1
                                                    @endif
                                                    @if ($history->siswa->kelas_id == 2)
                                                        12 RPL 2
                                                    @endif
                                                    @if ($history->siswa->kelas_id == 3)
                                                        11 RPL 1
                                                    @endif
                                                    @if ($history->siswa->kelas_id == 4)
                                                        11 RPL 2
                                                    @endif
                                                    @if ($history->siswa->kelas_id == 5)
                                                        10 RPL 1
                                                    @endif
                                                    @if ($history->siswa->kelas_id == 6)
                                                        10 RPL 2
                                                    @endif
                                                </b>
                                            </small>
                                            <small>{{ $history->created_at->diffForHumans() }}</small>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-10">
                                                <p class="mb-1 h6 text-dark ">{{ $history->rule->nama }}</p>
                                                <div class="text-danger d-inline-flex mb-2">
                                                    +{{ $history->rule->poin }}
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    @endforeach
                @else
                    <h5 class="text-secondary text-center py-1 mt-4">Histori tidak ada</h5>
                @endif

            </div>
            <div class="text-end card-footer mt-3">
                <div class="mx-4 text-decoration-none float-right">
                    {{ $histories->links() }}
                </div>
            </div>

        </div>
    </div>
@endsection
