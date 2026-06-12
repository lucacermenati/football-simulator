import DateInput from "@/Components/DateInput";
import FileInput from "@/Components/FileInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextareaInput from "@/Components/TextareaInput";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";
import { useState, useEffect } from "react";

export default function CompetitionMatchesForm({
    competition,
    onSuccess,
    onCancel,
}) {
    const form = useForm({
        start_date: competition?.start_date,
    });

    const submit = (e) => {
        e.preventDefault();

        form.post(route("competitions.matches.generate", competition.id), {
            forceFormData: true,
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                onSuccess?.();
            },
        });
    };

    return (
        <div className="p-6">
            {competition && (
                <h3 className="text-lg font-medium text-primaryRed-600">
                    Generate Matches for {competition?.name}
                </h3>
            )}
            {competition && (
                <p className="mt-1 text-sm text-darkGray-600">
                    Select a start date to generate matches for this
                    competition.
                </p>
            )}

            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="start_date">Start date</InputLabel>
                    <DateInput
                        value={form.data.start_date}
                        onChange={(e) =>
                            form.setData("start_date", e.target.value)
                        }
                    />
                </div>
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            form.reset();
                            onCancel?.();
                        }}
                    >
                        Cancel
                    </SecondaryButton>

                    <PrimaryButton type="submit" disabled={form.processing}>
                        Generate
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
