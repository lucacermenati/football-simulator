import TeamLogo from "./TeamLogo";
import { useState } from "react";
import { Link } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import Modal from "@/Components/Modal";

export default function TeamLayout({ children, team }) {
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);

    return (
        <>
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between mt-2 mb-6">
                        <div className="flex space-x-4">
                            <TeamLogo team={team} className="w-32 h-32" />
                            <div className="flex flex-col">
                                <Link
                                    className="pt-2 text-2xl font-bold text-darkGrey-600 hover:underline"
                                    href={route("teams.show", {
                                        team: team.id,
                                    })}
                                >
                                    {team.name}
                                </Link>
                                <div className="p-2 mt-auto space-x-4 text-darkGrey-600">
                                    <Link
                                        className="hover:underline"
                                        href={route("teams.info", {
                                            team: team.id,
                                        })}
                                    >
                                        Info
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route("teams.players", {
                                            team: team.id,
                                        })}
                                    >
                                        Players
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div className="grid grid-cols-2 gap-4">
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsEditModalOpen(true)}
                            >
                                EDIT
                            </PrimaryButton>
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsDeleteModalOpen(true)}
                            >
                                DELETE
                            </PrimaryButton>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        {children}
                    </div>
                </div>
            </div>
            <Modal show={isEditModalOpen}>
                <p>Edit team form</p>
            </Modal>
            <Modal show={isDeleteModalOpen}>
                <div className="p-6">
                    <h3 className="text-lg font-medium text-primaryRed-600">
                        Delete team
                    </h3>
                    <p>
                        Are you sure you want to delete this team? This action
                        cannot be undone.
                    </p>
                    <div className="flex gap-2 justify-end mt-8">
                        <SecondaryButton
                            onClick={() => setIsDeleteModalOpen(false)}
                        >
                            Cancel
                        </SecondaryButton>
                        <Link
                            method="delete"
                            href={route("teams.destroy", {
                                team: team.id,
                            })}
                        >
                            <PrimaryButton>Delete</PrimaryButton>
                        </Link>
                    </div>
                </div>
            </Modal>
        </>
    );
}
