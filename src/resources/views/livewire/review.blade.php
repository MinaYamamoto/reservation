<div class="modal">
    <div class="review-modal">
        <button wire:click="openModal()" class="review__submit" id="review__submit">レビューを投稿</button>
    </div>
    @if($showModal)
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="review-modalLabel">&#x1F4AC; レビューの投稿</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h3>スター</h3>
                    <div id="star">
                        <star-rating v-model="rating"></star-rating>
                        <input type="hidden" name="score" :value="this.rating" />
                    </div>
                </div>
                <div class="form-group">
                    <h3>コメント</h3>
                    <textarea class="form-control" v-model="reviewParams.comment"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link mr-2" wire:click="closeModal()">閉じる</button>
                <button type="button" class="btn btn-warning">投稿する</button>
            </div>
        </div>
    </div>
    @endif
</div>
