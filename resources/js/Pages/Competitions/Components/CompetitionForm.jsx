import FileInput from "@/Components/FileInput";
import InputLabel from "@/Components/InputLabel";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import TextareaInput from "@/Components/TextareaInput";
import TextInput from "@/Components/TextInput";
import { useForm } from "@inertiajs/react";

export default function CompetitionForm({
    onCancel,
    onSubmit,
    cancelText = "Cancel",
    submitText = "Create",
    title = "Add Competition",
    description = "Create a new competition",
    competition = null,
}) {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: competition?.name || "",
        logo: competition?.logo || "",
        description: competition?.description || "",
    });

    return (
        <div className="p-6">
            <h3 className="text-lg font-medium text-primaryRed-600">{title}</h3>
            <p className="mt-1 text-sm text-lightGrey-800">{description}</p>
            <form
                className="flex flex-col mt-4 space-y-4"
                onSubmit={(e) => {
                    e.preventDefault();
                    onSubmit(data);
                }}
            >
                <div>
                    <InputLabel htmlFor="name">Name</InputLabel>
                    <TextInput
                        id="name"
                        value={data.name}
                        onChange={(e) => setData("name", e.target.value)}
                        placeholder="Competition name"
                    />
                </div>
                <div>
                    <InputLabel htmlFor="description">History</InputLabel>
                    <TextareaInput
                        className="mt-1 w-full"
                        id="description"
                        value={data.description}
                        onChange={(e) => setData("description", e.target.value)}
                        placeholder="Competition history"
                        rows={5}
                    />
                </div>
                <div>
                    <InputLabel htmlFor="logo">Logo</InputLabel>
                    <FileInput
                        className="mt-1"
                        id="logo"
                        name="logo"
                        accept="image/*"
                        onChange={(file) => setData("logo", file)}
                        buttonLabel="Upload logo"
                    />
                </div>
                <div className="flex gap-2 justify-end mt-8">
                    <SecondaryButton type="button" onClick={onCancel}>
                        {cancelText}
                    </SecondaryButton>
                    <PrimaryButton type="submit" disabled={processing}>
                        {submitText}
                    </PrimaryButton>
                </div>
            </form>
        </div>
    );
}
