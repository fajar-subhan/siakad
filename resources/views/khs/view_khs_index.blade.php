@extends('layouts.app', $data)
@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="card">
                <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-7 p-lg-17">
                        <div class="card">
                            <div class="card text-dark" style="max-width: 50rem;">
                                <div class="card-header"
                                    style="font-weight: bold;padding-top:4%;text-transform: uppercase">
                                    Kartu Hasil Studi
                                </div>
                                <div class="card-body">
                                    @php 
                                    $totalSKS  = 0;
                                    $totalMutu = 0;
                                    @endphp
                                    <table class="table table-bordered table-hover text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode MK</th>
                                                <th>Matakuliah</th>
                                                <th>Semester</th>
                                                <th>SKS</th>
                                                <th>Nilai</th>
                                                <th>Grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rows as $row)
                                            @php 
                                            $nilai = CalculateValue($row->id);
                                            $grade = CalculateGrade($nilai);
                                            $mutu  = CalculateMutu($grade);
                                            @endphp 
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->subject_code }}</td>
                                                <td style="text-align: left">{{ $row->subject->name }}</td>
                                                <td style="text-align: center">{{ $row->semester_id }}</td>
                                                <td>{{ $row->subject->sks }}</td>
                                                <td>{{ CalculateValue($row->id) }}</td>
                                                <td>{{ $grade }}</td>
                                            </tr>

                                            @php 
                                            $totalSKS  = $totalSKS  + $row->subject->sks;
                                            $totalMutu = $totalMutu + $mutu;
                                            @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="3" style="text-align: left">Jumlah SKS</td>
                                                <td style="text-align: center">{{ $totalSKS }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" style="text-align: left">Jumlah Mutu</td>
                                                <td style="text-align: center">{{ $totalMutu }}</td>
                                            </tr>
                                            <tr>
                                                @php 
                                                    if(empty($totalMutu) OR empty($totalSKS))
                                                    {
                                                        $ipk = 0;
                                                    }
                                                    else
                                                    {
                                                        $ipk = $totalSKS/$totalMutu;
                                                    } 
                                                @endphp 
                                                <td colspan="3" style="text-align: left">IPK</td>
                                                <td>{{ $ipk }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="khs/pdf" class="btn btn-sm btn-info">Cetak PDF</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
