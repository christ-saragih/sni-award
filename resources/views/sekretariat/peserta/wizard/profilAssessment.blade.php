<style>
    .kategori-select {
        padding: 10px 20px;
        border: none;
        outline: none;
        background-color: #CC9305;
        border-radius: 15px;
        color: #fff;
        font-weight: bold;
    }
    .kategori-option {
        background-color: #fff;
        color: #000;
        font-weight: 500;
    }
    .jawaban-label {
        flex: 0 1 calc(48%);
        border: 1px solid #9fafbf;
        border-radius: 10px;
        font-size: 125%;
    }
    .selected-jawaban {
        background-color: #E9ECFA;
    }
</style>
@php
    $registrasi_assessment = [];
    if ($registrasi->registrasi_assessment) {
        $registrasi_assessment = $registrasi->registrasi_assessment;
    }
@endphp
<div class="content-profil py-5">
    {{-- head --}}
    <div class="d-flex align-items-center">
        <div style="width: 100%;height: 5px; border-radius: 10px 0 0 10px; background-color: #CC9305;"></div>
        <select name="assessment_kategori" id="" class="kategori-select" oninput="handleChangeKategori(this)">
            @foreach ($assessment_kategori as $key=>$ak)
                <option value="{{ $ak->nama }}" {{ request()->query('assessment_kategori') == $ak->nama ? 'selected' : '' }} class="kategori-option">{{ $ak->nama }}</option>
            @endforeach
        </select>

    </div>
    {{-- end head --}}
    <form action="{{ route('sekretariat.peserta.profil.assessment.download', $registrasi->id) }}" method="POST">
        @csrf
        <button type="submit">
            Unduh sebagai PDF
        </button>
    </form>
    {{-- content --}}
    <div id="all_assessment">
        @foreach ($selected_assessment_kategori as $ak)
            @foreach ($ak->assessment_sub_kategori as $ask)
                @foreach ($ask->assessment_pertanyaan as $key=>$ap)
                    <div class="pertanyaan-container d-flex flex-column align-items-center w-100 mt-4">
                        <div class="kategori d-flex flex-column justify-content-center align-items-center py-3">
                            <h3 class="m-0">Pertanyaan {{ $loop->parent->iteration }}.{{ $loop->iteration }}</h3>
                            <p class="m-0">{{ $ask->nama }}</p>
                        </div>
                        <div class="pertanyaan d-flex flex-column text-center">
                            <p class="m-0">{{ $ap->pertanyaan }}</p>
                        </div>
                        <div class="jawaban d-flex flex-wrap justify-content-between align-items-center w-100 mt-4 gap-3">
                            @foreach ($ap->assessment_jawaban as $aj)
                                @php
                                    $pertanyaan = $registrasi_assessment->where('assessment_pertanyaan_id', $ap->id)->first();
                                    $jawaban = $pertanyaan ? $pertanyaan->assessment_jawaban_id : '';
                                @endphp
                                <div class="jawaban-label d-flex align-items-center py-1 px-3 {{ $aj->id == $jawaban ? 'selected-jawaban' : '' }}">
                                    {{ $aj->jawaban }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endforeach
    </div>
    {{-- end content --}}
</div>
<script>
    const handleChangeKategori = (e) => {
        location.href = `${location.href}&assessment_kategori=${e.value}`
    }
</script>