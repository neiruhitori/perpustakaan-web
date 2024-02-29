<form action="/createpeminjaman" id="form-store" method="post">
    @csrf
    <div class="form-group row">

        <div class="col-md-6">
            <label>Buku :</label>
            {{-- <input type="text" class="form-control" id="buku_id" name="buku_id"
                placeholder=" Masukkan Nama buku"/> --}}
            <select class="form-control" id="buku_id" name="buku_id">
                @foreach ($buku as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Nama :</label>
            <input type="text" class="form-control" id="name" name="name"
                placeholder=" Masukkan Nama Siswa" />
        </div>

        <div class="col-md-6">
            <label>Kelas :</label>
            <input type="text" class="form-control" id="kelas" name="kelas" placeholder=" Masukkan Kelas" />
        </div>
        <div class="col-md-6">
            <label>Jumlah Buku :</label>
            <input type="text" class="form-control" id="jml_buku" name="jml_buku"
                placeholder=" Masukkan Jumlah Buku yang di Pinjam" />
        </div>
        <!-- Date and time -->
        <div class="form-group">
            <label>Tanggal Pinjam :</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                <input type="date" name="tgl_pinjam" class="form-control datetimepicker-input"
                    data-target="#reservationdatetime" />
                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                </div>
            </div>
        </div>
        <!-- /.form group -->
        <!-- Date and time -->
        <div class="form-group">
            <label>Tanggal Kembali :</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                <input type="date" name="tgl_kembali" class="form-control datetimepicker-input"
                    data-target="#reservationdatetime" />
                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                </div>
            </div>
        </div>
        <!-- /.form group -->

    </div>
    <div class="form-group mb-0">
        <div>
            <button type="submit" class="btn btn-primary waves-light waves-effect" id="store-modal"> <i
                    class="fas fa-plus-circle"></i>
                Simpan
            </button>
        </div>
    </div>
</form>
