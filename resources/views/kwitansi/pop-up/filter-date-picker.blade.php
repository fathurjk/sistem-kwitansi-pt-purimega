<div class="modal fade" id="filterDatePickerModal" tabindex="-1" aria-labelledby="filterDatePickerModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="filterDatePickerModalLabel">Pilih Rentang Tanggal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="start_date_filter" class="form-label">Tanggal Mulai</label>
                    <input type="date" class="form-control shadow-sm" id="start_date_filter" name="start_date_filter"
                        required>
                </div>
                <div class="mb-3">
                    <label for="end_date_filter" class="form-label">Tanggal Akhir</label>
                    <input type="date" class="form-control shadow-sm" id="end_date_filter" name="end_date_filter"
                        required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-print" id="filterDatePickerModalButton">Tampilkan</button>
            </div>
        </div>
    </div>
</div>
