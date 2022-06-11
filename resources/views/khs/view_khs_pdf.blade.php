<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <title>Cetak KHS - Kartu Hasil Studi</title>
    <meta charset="utf-8" />
    <meta name="description" content="SIAKAD" />
    <style>
        .center {
            text-align: center;
        }

        .upper {
            text-transform: uppercase;
        }

        .bottom {
            margin-bottom: 10%;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px
        }

    </style>
</head>
<!--end::Head-->
<!--begin::Body-->

<body>
    <div class="center upper bottom">
        <h1>Kartu Hasil Studi</h1>
    </div>

    <table>
        <tr>
            <td>Nama Mahasiswa</td>
            <td>{{ Auth::user()->name }}</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>{{ Auth::user()->nim }}</td>
        </tr>
    </table>
    <div>
        @php
            $totalSKS = 0;
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
                @foreach ($rows as $row)
                    @php
                        $nilai = CalculateValue($row->id);
                        $grade = CalculateGrade($nilai);
                        $mutu = CalculateMutu($grade);
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->subject_code }}</td>
                        <td style="text-align: left">
                            {{ $row->subject->name }}</td>
                        <td style="text-align: center">
                            {{ $row->semester_id }}</td>
                        <td>{{ $row->subject->sks }}</td>
                        <td>{{ CalculateValue($row->id) }}</td>
                        <td>{{ $grade }}</td>
                    </tr>

                    @php
                        $totalSKS = $totalSKS + $row->subject->sks;
                        $totalMutu = $totalMutu + $mutu;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3" style="text-align: left">Jumlah SKS</td>
                    <td class="center" colspan="4">{{ $totalSKS }}</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: left">Jumlah Mutu
                    </td>
                    <td class="center" colspan="4">{{ $totalMutu }}</td>
                </tr>
                <tr>
                    @php
                        if (empty($totalMutu) or empty($totalSKS)) {
                            $ipk = 0;
                        } else {
                            $ipk = $totalSKS / $totalMutu;
                        }
                    @endphp
                    <td colspan="3" style="text-align: left">IPK</td>
                    <td class="center" colspan="4">{{ $ipk }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
