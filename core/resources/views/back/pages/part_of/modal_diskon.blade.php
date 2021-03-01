<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <form action="{{ route("change.diskon") }}" method="POST" >
                @csrf
                <div class="form-group row mt-5">
                   
                        <label>Masukan Jumlah Diskon (%)</label>
                        <input type="number" name="diskon" required min="0" class="form-control">
                        <input type="hidden" name="id" value="{{ $temp->id }}">
                    
                        {{-- <button class="btn btn-primary btn-sm float-right mt-3">Simpan Perubahan</button> --}}
                    
                </div>
            </form>
        </div>
        
    </div>
</div>