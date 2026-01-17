import FileInput from "@/Components/FileInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextareaInput from "@/Components/TextareaInput";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";

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
    });

    const submit = (e) => {
        e.preventDefault();

        const m = method.toLowerCase();
        const action = m === "post" ? form.post : form.patch;

        if (!(form.data.logo instanceof File)) {
            form.setData("logo", null);
        }

        action(url, {
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
            {title && (
                <h3 className="text-lg font-medium text-primaryRed-600">
                    {title}
                </h3>
            )}
            {description && (
                <p className="mt-1 text-sm text-lightGrey-800">{description}</p>
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
                    {form.errors.name && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.name}
                        </div>
                    )}
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
                    {form.errors.description && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.description}
                        </div>
                    )}
                </div>

                <div>
                    <InputLabel htmlFor="logo">Logo</InputLabel>

                    <FileInput
                        className="mt-2"
                        id="logo"
                        name="logo"
                        accept="image/*"
                        onChange={(file) => form.setData("logo", file)}
                        buttonLabel="Upload logo"
                        initialFileName={competition?.logo || ""}
                    />

                    {form.errors.logo && (
                        <div className="mt-1 text-sm text-red-600">
                            {form.errors.logo}
                        </div>
                    )}
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
