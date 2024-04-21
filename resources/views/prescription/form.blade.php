@if (count($bookings) > 0)
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{ $booking->user->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('prescription') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="app">
                        <input type="hidden" name="user_id" value="{{ $booking->user_id }}">
                        <input type="hidden" name="doctor_id" value="{{ $booking->doctor_id }}">
                        <input type="hidden" name="date" value="{{ $booking->date }}">
                        <div class="form-group">
                            <label>Disease</label>
                            <input type="text" name="name_of_disease" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Symptoms</label>
                            <textarea name="symptoms" class="form-control" placeholder="Symptoms" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Medicine</label>
                            <add-btn></add-btn>
                        </div>
                        <div class="form-group">
                            <label>Procedure to use medicine</label>
                            <textarea name="procedure_to_use_medicine" class="form-control" placeholder="Procedure to use medicine" required></textarea>

                        </div>
                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea name="feedback" class="form-control" placeholder="Feedback" required></textarea>

                        </div>
                        <div class="form-group">
                            <label>Signature</label>
                            <input type="text" name="signature" class="form-control" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endif
