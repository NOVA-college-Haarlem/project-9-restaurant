<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feedback geven</title>
        <style>

        </style>
    </head>

    <body>
        <div class="feedback-container">
            <h1 class="feedback-title">Feedback geven</h1>

           

            <form action="{{ route('feedback.store') }}" method="POST" enctype="multipart/form-data" class="feedback-form">
                @csrf
                <div class="mb-3">
                    <label for="user_name" class="form-label">Je naam</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" required>
                </div>
                <div class="mb-3">
                    <label for="user_email" class="form-label">Je email</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" required>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Beoordeling (1-10)</label>
                    <input type="number" class="form-control rating-input" id="rating" name="rating" min="1" max="10" required>
                </div>
                <div class="mb-3">
                    <label for="food_comment" class="form-label">Commentaar over het eten</label>
                    <textarea class="form-control" id="food_comment" name="food_comment" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="service_comment" class="form-label">Commentaar over de service</label>
                    <textarea class="form-control" id="service_comment" name="service_comment" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="ambiance_comment" class="form-label">Commentaar over de sfeer</label>
                    <textarea class="form-control" id="ambiance_comment" name="ambiance_comment" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Foto uploaden (optioneel)</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                </div>
                <div class="mb-3 form-check">
                    <input type="hidden" name="is_public" value="0">
                    <input type="checkbox" class="form-check-input" id="is_public" name="is_public" value="1" checked>
                    <label class="form-check-label" for="is_public">Feedback publiek maken</label>
                </div>
                <button type="submit" class="submit-btn">Versturen</button>
            </form>
        </div>
    </body>

    </html>
</x-app-layout>