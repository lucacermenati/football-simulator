import FileInput from "@/Components/FileInput";
import InputError from "@/Components/InputError";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextareaInput from "@/Components/TextAreaInput";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";
import { useState, useEffect } from "react";

export default function CompetitionForm({
    url,
    method = "post", // "post" | "put" | "patch"
    cancelText = "Cancel",
    submitText = "Save",
    title,
    description,
    competition = null,
    onSuccess,
    onCancel,
}) {
    const form = useForm({
        name: competition?.name ?? "",
        description: competition?.description ?? "",
        logo: null, // File or null
        remove_logo: false, // To distinguish two situation with logo: null, "Remove the old logo" and "Do not update the logo"
    });

    const submit = (e) => {
        e.preventDefault();

        const m = method.toLowerCase();
        const action = m === "post" ? form.post : form.patch;

        action(url, {
            forceFormData: true,
            preserveScroll: true,
            onSuccess: () => {
                form.reset();
                onSuccess?.();
            },
            onError: (error) => {
                console.log({ error });
            },
        });
    };

    return (
        <div className="p-6">
            {title && (
                <h3 className="text-lg font-medium text-primaryRed-600">
                    {title}
                </h3>
            )}
            {description && (
                <p className="mt-1 text-sm text-darkGray-600">{description}</p>
            )}

            <form className="flex flex-col mt-4 space-y-4" onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="name">Name</InputLabel>
                    <TextInput
                        id="name"
                        value={form.data.name}
                        onChange={(e) => form.setData("name", e.target.value)}
                        placeholder="Competition name"
                    />
                    <InputError message={form.errors.name} className="mt-1" />
                </div>

                <div>
                    <InputLabel htmlFor="description">History</InputLabel>
                    <TextareaInput
                        className="mt-1 w-full"
                        id="description"
                        value={form.data.description}
                        onChange={(e) =>
                            form.setData("description", e.target.value)
                        }
                        placeholder="Competition history"
                        rows={5}
                    />
                    <InputError
                        message={form.errors.description}
                        className="mt-1"
                    />
                </div>

                <div>
                    <InputLabel htmlFor="logo">Logo</InputLabel>

                    <FileInput
                        id="logo"
                        name="logo"
                        accept="image/*"
                        existingUrl={competition?.logo ?? null}
                        buttonLabel="Upload logo"
                        onChange={({ file, remove }) => {
                            form.setData("logo", file);
                            form.setData("remove_logo", remove);
                        }}
                    />

                    <InputError message={form.errors.logo} className="mt-1" />
                </div>

                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton
                        type="button"
                        onClick={() => {
                            form.reset("logo");
                            onCancel?.();
                        }}
                    >
                        {cancelText}
                    </SecondaryButton>

                    <PrimaryButton type="submit" disabled={form.processing}>
                        {submitText}
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
